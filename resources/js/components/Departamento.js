import React, { useState, useEffect } from 'react';
import MaterialTable from 'material-table';
import axios from 'axios';
import blueGrey from '@material-ui/core/colors/blueGrey';
import { size } from 'lodash';

//Usando Hook (sin clases)

function Departamento() {

    //field tiene que coincidir con el campo de la base de datos
    const [columns, setColumns] = useState([
        { title: 'Id', field: 'id', hidden: true },
        { title: 'Departamento', field: 'departamento' },

    ]);
    //Tabla con los datos, añade estado al componente
    const [data, setData] = useState([
        { id: '', departamento: '' }
    ]);
    //Constante conexión http
    const baseURL = 'http://127.0.0.1:8000/api/';

    //Errores
    const [iserror, setIserror] = useState(false);
    const [errorMessages, setErrorMessages] = useState([]);

    /**
     * useEffect es igual al componentDidMount, componentDidUpdate y componentWillUnmount combinados
     * Accede al ciclo de vida del componente y por tanto, se renderiza el componente cada vez que haya un cambio
     * y cuando se inicia el componente.
     */
    useEffect(() => {
        document.title = "Departamentos";
        axios.get(baseURL + 'ListarDepartamentos').then(response => {
            setData(response.data)
        }).catch(error => {
            setErrorMessages(["Error al cargar los datos"])
            setIserror(true)
        })
    }, []) // Este array vacío representa una lista vacía de dependencias, solo cuando se monta el componente de ahí a qué deba estar vacío

    //Añadir departamento
    const handleRowAdd = (newData, resolve) => {
        //validation
        if (newData.departamento == null || newData.departamento.length == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El campo departamento no puede estar vacío',
            })
            setData([...data]);
            resolve()
        }

        axios.post(baseURL + 'AnadirDepartamento', newData).then(response => {
            if (response.data.message == 'El departamento ya existe') {
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
                let dataToAdd = [...data];
                dataToAdd.push(newData); //añade el nuevo valor al array
                setData(dataToAdd);
                resolve()
                //window.location.reload(); //refresca la página
                /*setData([...data, newData]);
                resolve()*/
            }
          
        }).catch(error => {
            setErrorMessages(["No se pudo añadir. Server error!"])
            setIserror(true)
            resolve()
        })
    }
    //Actualizar campos
    const handleRowUpdate = (newData, oldData, resolve) => {
        if (newData.departamento == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El campo departamento no puede estar vacío',
            })
        }
        axios.put(baseURL + 'ModificarDepartamento/' + newData.id, newData).then(response => {
            if (response.data.message == 'Este departamento ya esta registrado') {
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
            setErrorMessages(["Actualización fallida! Server error"])
            setIserror(true)
            resolve()

        })
    }
    //Eliminar datos de la tabla
    const handleRowDelete = (oldData, resolve) => {
        axios.delete(baseURL + 'BorrarDepartamento/' + oldData.id).then(response => {
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
            title="Gestión de Departamentos"
            columns={columns}
            data={data}
            options={{
                exportButton: true,
                headerStyle: { position: 'sticky', top: 0, fontWeight: 'bold', backgroundColor: blueGrey[50] },
                tableLayout : 'auto',
                
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
                    actions: 'Acciones',
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

export default Departamento;


