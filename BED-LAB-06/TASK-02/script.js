document.addEventListener('DOMContentLoaded', function () {
    const noteForm = document.getElementById('note-form');
    const notesContainer = document.getElementById('notes-container');

    fetchNotes();

    noteForm.addEventListener('submit', function (event) {
        event.preventDefault();
        addNote();
    });

    function fetchNotes() {
        fetch('api.php?action=get_notes')
            .then(response => response.json())
            .then(data => displayNotes(data));
    }

    function displayNotes(notes) {
        notesContainer.innerHTML = '';
        notes.forEach(note => {
            const noteElement = document.createElement('div');
            noteElement.classList.add('note');
            noteElement.setAttribute('data-id', note.id);
            noteElement.innerHTML = `
                <h2>${note.title}</h2>
                <p>${note.content}</p>
                <button class='edit-btn'>Edit</button>
                <button class='delete-btn'>Delete</button>
            `;
            notesContainer.appendChild(noteElement);
        });
    }

    function addNote() {
        const title = document.getElementById('title').value;
        const content = document.getElementById('content').value;

        fetch('api.php?action=add_note', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `title=${encodeURIComponent(title)}&content=${encodeURIComponent(content)}`,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    fetchNotes();
                    clearForm();
                } else {
                    alert(data.message);
                }
            });
    }

    function clearForm() {
        document.getElementById('title').value = '';
        document.getElementById('content').value = '';
    }

    notesContainer.addEventListener('click', function (event) {
        const target = event.target;
        const noteElement = target.closest('.note');
        if (target.classList.contains('edit-btn')) {
            editNote(noteElement);
        } else if (target.classList.contains('delete-btn')) {
            deleteNote(noteElement);
        }
    });

    function editNote(noteElement) {
        const id = noteElement.dataset.id;
        const title = prompt('Edit title:', noteElement.querySelector('h2').innerText);
        const content = prompt('Edit content:', noteElement.querySelector('p').innerText);

        fetch(`api.php?action=update_note&id=${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `title=${encodeURIComponent(title)}&content=${encodeURIComponent(content)}`,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    fetchNotes();
                } else {
                    alert(data.message);
                }
            });
    }

    function deleteNote(noteElement) {
        const id = noteElement.dataset.id;
        const confirmDelete = confirm('Are you sure you want to delete this note?');

        if (confirmDelete) {
            fetch(`api.php?action=delete_note&id=${id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        fetchNotes();
                    } else {
                        alert(data.message);
                    }
                });
        }
    }
});
