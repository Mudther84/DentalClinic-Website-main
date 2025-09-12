document.querySelector("form").addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('api/create_patient.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            alert(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
});

// لجلب البيانات من قاعدة البيانات وعرضها
fetch('api/read_patients.php')
    .then(response => response.json())
    .then(data => {
        const tableBody = document.querySelector('#patients-table tbody');
        data.forEach(patient => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${patient.name}</td>
                <td>${patient.email}</td>
                <td>${patient.phone}</td>
                <td>${patient.date}</td>
            `;
            tableBody.appendChild(row);
        });
    })
    .catch(error => console.error('Error fetching data:', error));
