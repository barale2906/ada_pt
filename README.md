## ESTA API

Esta es una API REST sencilla diseñada para gestionar inventarios, teniendo en cuenta los productos y sus ubicaciones, genera historial de registros y los saldos al final de cada registro.


- Categorias, esta ruta gestiona el CRUD de las categorias [ruta](http://127.0.0.1:8000/api/categorias).
- Productos, esta ruta gestiona el CRUD de los productos [ruta](http://127.0.0.1:8000/api/productos).
- Inventarios, esta ruta gestiona el CRUD de las inventarios [ruta](http://127.0.0.1:8000/api/inventarios).

## Categorias

Muestra un listado con las categorias registradas en el sistema, incluyendo los productos cargados en cada categoria.
Para crear / modificar una Se requiere un json con esta estructura: {
    "nombre": "Categoria ejemplo dos tres",
    "descripcion": "Esta es una categoría de ejemplo tres"
}

## Productos

Muestra un listado con los productos registradas en el sistema, incluyendo los inventarios cargados para cada producto.
Para crear / modificar uno Se requiere un json con esta estructura: {
    "nombre": "sandalias",
    "descripcion": "sandalias uno",
    "precio": 100,
    "categoria_id":1
}

## Inventarios

Muestra un listado con los saldos de los productos, mostrando el último registro.
Para crear uno Se requiere un json con esta estructura: {
    "tipo": 2,
    "cantidad": 2,
    "ubicacion": "primer piso",
    "producto_id":1
}
El tipo indica si el movimiento es de entrada o de sálida, siendo 1 entrada y 2 sálida.
