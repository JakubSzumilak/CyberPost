document.getElementById('csvFile').addEventListener('change', handleFileSelect, false);

function handleFileSelect(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(event) {
        const csvData = event.target.result;
        const emails = parseCSV(csvData);
        document.getElementById('recipientEmail').value = emails.join(', ');
        document.getElementById('emailCount').innerText = `Liczba wybranych osób: ${emails.length}`;

        document.cookie="email_count="+emails.length;
        let emailsJSON = JSON.stringify(emails);
        document.cookie="emailsJSON="+emailsJSON;
    };

    reader.readAsText(file);
}

function parseCSV(csv) {
    const lines = csv.split('\n');
    const emails = [];

    // Pomijamy pierwszy wiersz, który zawiera nagłówki
    for (let i = 1; i < lines.length; i++) {
        const columns = lines[i].split(',');

        if (columns.length === 3) {
            const email = columns[2].trim();
            if (email) {
                emails.push(email);
            }
        }
    }

    return emails;
}

