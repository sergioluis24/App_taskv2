traerData = () => {
    fetch(`http://localhost/xampp/App_tasksV2/backend/data.php`)
        .then(res => res.json())
        .then(data => {
            console.log(data)
            data_aux = data
        })
        .catch(error => console.error(error))
    }

traerData()
