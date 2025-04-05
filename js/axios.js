document.getElementById('registerForm').addEventListener('submit', function (e) {
    e.preventDefault();

    let formData = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        password: document.getElementById('password').value,
        phone: document.getElementById('phone').value,
        dob: document.getElementById('dob').value,
        gender: document.getElementById('gender').value,
        notes: document.getElementById('notes').value,
    };

    axios.post('register.php', formData)
        .then(response => alert(response.data.message))
        .catch(error => alert(error.response.data.error));
});