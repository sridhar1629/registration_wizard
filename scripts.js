document.getElementById('registrationForm').addEventListener('submit', function(event) {
    var password = document.getElementById('password').value;
    if (password.length < 5) {
        alert('Password must be at least 5 characters long.');
        event.preventDefault();
    }
});
