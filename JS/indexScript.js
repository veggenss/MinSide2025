fetch('/api/data')
  .then(response => response.json())
  .then(result => {
    console.log(result.data); // use the data here
  })
  .catch(error => console.error('Error:', error));
