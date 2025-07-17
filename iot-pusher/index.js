const API_ENDPOINT = 'http://webserver/api/temphumidity';

function generateSensorData() {
    return {
        temperature: parseFloat((25 + Math.random() * 5).toFixed(2)),
        humidity: parseFloat((50 + Math.random() * 20).toFixed(1))
    };
}

async function pushData() {
    const data = generateSensorData();
    console.log('Sending:', data);

    try {
        const response = await fetch(API_ENDPOINT, {   // fetch native
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();

        if (response.ok) {
            console.log('Success:', result.message);
        } else {
            console.error('API Error:', result);
        }

    } catch (error) {
        console.error('Request Failed:', error.message);
    }
}

setInterval(pushData, 30000);
