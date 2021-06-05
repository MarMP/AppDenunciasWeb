import React, { useState, useEffect } from 'react';
import MaterialTable from 'material-table';
import axios from 'axios';
import blueGrey from '@material-ui/core/colors/blueGrey';

//Validación del email
function validarEmail(email) {
    const re = /^((?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\]))$/;
    return re.test(String(email).toLowerCase());
}

function GestionEmpleados() {

    //Errores
    const [iserror, setIserror] = useState(false)
    const [errorMessages, setErrorMessages] = useState([])

    //Cabecera de conexión http
    const baseURL = 'http://127.0.0.1:8000/api/';

    /**
     * Data: variable de estado que no hay que modificar directamente. Para ello se utiliza setData (función que probee Hooks useState para modificar el estado)
     * useState recibe un parámetro que será el valor del estado inicial que se le quiere asignar.
     * useState retorna dos valores: uno es el estado actual y otro la función que lo va a actualizar
     */
    const [data, setData] = useState([{ id: '', nombre: '', apellidos: '', id_departamento: '', puesto: '', email: '', telefono: '', password: '' }]);

    /**
     * useEffect es igual al componentDidMount, componentDidUpdate y componentWillUnmount unificado.
     * Accede al ciclo de vida del componente y por tanto, se renderiza el componente cada vez que haya un cambio
     */
    useEffect(() => {
        document.title = "Empleados";
        axios.get(baseURL + 'ListarEmpleados').then(response => {
            setData(response.data)
        }).catch(error => {
            setErrorMessages(["Error al cargar los datos"])
            setIserror(true)
        })
    }, []) // Este array vacío representa una lista vacía de dependencias

    //field tiene que coincidir con el campo de la base de datos
    const [columns, setColumns] = useState([
        { title: 'Id', field: 'id', editable: 'never', searchable: false },
        { title: 'Nombre', field: 'nombre' },
        { title: 'Apellidos', field: 'apellidos' },
        {
            title: 'Departamento',
            field: 'id_departamento',
            lookup: { 1: 'Marketing', 2: 'Desarrollo', 3: 'Soporte', 5: 'Comercial', 6: 'Gerencia', 7: 'Recursos Humanos',
                        8: 'Compras', 9: 'Logística y Seguridad', 10: 'Sistemas y Tecnología' },
        },
        { title: 'Puesto', field: 'puesto' },
        { title: 'Email', field: 'email', initialEditValue: 'example@email.com' },
        { title: 'Teléfono', field: 'telefono', searchable: false  },
    ]);

    //Añadir comunicaciones
    const handleRowAdd = (newData, resolve) => {
        //validation
        if (newData.nombre == null  || newData.apellidos == null || newData.id_departamento == null) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Los campos no pueden estar vacíos',
            })
        }
        if (newData.nombre.length == 0 || newData.apellidos.length == 0 || newData.id_departamento.length == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Los campos no pueden estar vacíos',
            })
        }
        if (!validarEmail(newData.email)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Introduce un correo válido',
            })
        }
        axios.post(baseURL + 'AnadirEmpleado', newData).then(response => {
            if (response.data.message == 'Este empleado ya existe') {
                Swal.fire({
                    icon: 'error',
                    text: response.data.message
                })
                setData([...data]);
                resolve()
            } else {
                Swal.fire({
                    icon: 'success',
                    text: response.data.message
                })
                setData([...data, newData]);
                resolve()
                location.reload(); //refresca la página
            }

        }).catch(error => {
            setErrorMessages(["No se pudo añadir. Server error!"])
            setIserror(true)
            resolve()
        })
    }
    //Actualizar campos
    const handleRowUpdate = (newData, oldData, resolve) => {
        let errores = [];

        if (newData.nombre == '' || newData.apellidos == '' || newData.id_departamento == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Los campos no puede estar vacíos',
            })
            errores.push("Error al actualizar el dato");
            setData([...data]);
            resolve()
        }
        if (!validarEmail(newData.email)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Introduce un correo válido',
            })
            errores.push("Error al actualizar el dato");
            setData([...data]);
            resolve()
        }
        if(errores.length < 1){ //No hay errores
            axios.put(baseURL + 'ModificarEmpleado/' + newData.id, newData).then(response => {
                if (response.data.message == 'Este empleado ya existe') {
                    Swal.fire({
                        icon: 'error',
                        text: response.data.message
                    })
                    setData([...data]);
                    resolve()
                } else {
                    Swal.fire({
                        icon: 'success',
                        text: response.data.message
                    })
                    const dataUpdate = [...data];
                    const index = oldData.tableData.id;
                    dataUpdate[index] = newData;
                    setData([...dataUpdate]);
                    resolve()
                }
            }).catch(error => {
                setErrorMessages(["Actualización fallida! Server error!"])
                setIserror(true)
                resolve()
            })
        }
   
    }
    //Eliminar datos de la tabla
    const handleRowDelete = (oldData, resolve) => {
        axios.delete(baseURL + 'BorrarEmpleado/' + oldData.id).then(response => {
            const dataDelete = [...data];
            const index = oldData.tableData.id;
            dataDelete.splice(index, 1);
            setData([...dataDelete]);
            resolve()
        }).catch(error => {
            setErrorMessages(["Borrado fallido! Server error"])
            setIserror(true)
            resolve()
        })
    }

    return (
        //Estilos y acciones para la tabla 
        <MaterialTable
            title="Gestión de Usuarios de la APP Móvil"
            columns={columns}
            data={data}
            options={{
                exportButton: true,
                headerStyle: { position: 'sticky', top: 0, fontWeight: 'bold', backgroundColor: blueGrey[50]},
                tableLayout : 'auto'
            }}
            localization={{
                body: {
                    addTooltip: 'Añadir',
                    deleteTooltip: 'Eliminar',
                    editTooltip: 'Editar',
                    editRow: {
                        deleteText: '¿Está seguro de que desea eliminar este campo?',
                        cancelTooltip: 'Cancelar',
                        saveTooltip: 'Aceptar'
                    }
                },
                header: {
                    actions: 'Acciones'
                },
                pagination: {
                    labelRowsSelect: 'Filas',
                    labelDisplayedRows: '{from}-{to} de {count}',
                    firstTooltip: 'Primera página',
                    previousTooltip: 'Anterior',
                    nextTooltip: 'Siguiente',
                    lastTooltip: 'Última página'
                },
                toolbar: {
                    exportTitle: 'Exportar a CSV o PDF',
                    //exportAriaLabel: 'Exportar',
                    exportName: 'Exportar a CSV',
                    exportName: 'Exportar a PDF',
                    searchTooltip: 'Buscar',
                    searchPlaceholder: 'Buscar'
                }
            }}

            editable={{
                onRowAdd: newData =>
                    new Promise((resolve, reject) => {
                        handleRowAdd(newData, resolve);
                    }),
                onRowUpdate: (newData, oldData) =>
                    new Promise((resolve, reject) => {
                        handleRowUpdate(newData, oldData, resolve);
                    }),
                onRowDelete: oldData =>
                    new Promise((resolve, reject) => {
                        handleRowDelete(oldData, resolve)
                    }),
            }}
        />
    )

}

export default GestionEmpleados;
