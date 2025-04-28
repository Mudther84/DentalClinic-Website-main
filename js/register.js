document.querySelector("form[action='register.php']").addEventListener("submit", function(e) {
    e.preventDefault();

    const data = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        phone: document.getElementById("phone").value,
        password: document.getElementById("password").value,
        confirm_password: document.getElementById("confirm-password").value
    };

    axios.post("/api/register.php", data)
        .then(response => {
            alert(response.data.message);
            if (response.data.status === "success") {
                window.location.href = "login.html";
            }
        })
        .catch(error => {
            alert("حدث خطأ أثناء التسجيل");
            console.error(error);
        });
});
