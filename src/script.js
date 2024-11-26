console.log("working");
function dataId(id) {
    console.log("ID:", id);
    fetch(`./Includes/get_product_details.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error('Error fetching product details:', data.error);
            } else {
                mostrarDetalleProducto(data.id, data.titulo, data.descripcion, data.imagen, data.precio, data.lanzamiento, data.publisher, data.genero);
            }
        })
        .catch(error => {
            console.error('Error fetching product details:', error);
        });
}
