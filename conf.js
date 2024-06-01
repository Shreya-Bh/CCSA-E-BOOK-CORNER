document.addEventListener('DOMContentLoaded', function () {
  
    fetchBooks();
});

function fetchBooks() {
   
    fetch('fetch_books.php')
        .then(response => response.json())
        .then(data => {
            const bookSelect = document.getElementById('bookSelect');

            
            data.forEach(book => {
                const option = document.createElement('option');
                option.value = book.book_id;
                option.text = book.bookname;
                bookSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching books:', error));
}

function submitForm() {
    const formElement = document.getElementById('bookForm');
    const formData = new FormData(formElement);

    console.log('Form data:', formData);

    fetch('update_user.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        console.log('Update response:', data);
        alert(data.message);
    })
    .catch(error => console.error('Error updating user:', error));
}
