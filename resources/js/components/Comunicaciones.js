import React, { useState, useEffect } from 'react';
import MaterialTable from 'material-table';
import axios from 'axios';
import blueGrey from '@material-ui/core/colors/blueGrey';

function Comunicaciones() {
    //field tiene que coincidir con el campo de la base de datos
    const [columns, setColumns] = useState([
        { title: 'Id', field: 'id', hidden: true },
        { title: 'Empleado', field: 'empleado', editable: 'never' },
        { title: 'Tipo de comunicación', field: 'tipo_comunicacion', editable: 'never' },
        { title: 'Departamento', field: 'departamento', editable: 'never' },
        { title: 'Comunicación del empleado', field: 'mensaje_comunicacion', editable: 'never', searchable: false, cellStyle: {overflow: "scroll"}},
        { title: 'Estado: Abierta/En proceso/Cerrada', field: 'estado', initialEditValue: 'Abierta' },
    ]);
    //Tabla con los datos, añade estado al componente
    const [data, setData] = useState([
        { empleado: '', tipo_comunicacion: '', departamento: '', mensaje_comunicacion: '', estado: 'Abierta'}
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
        document.title = "Comunicaciones";
        axios.get(baseURL + 'ListarComunicaciones').then(response => {
            setData(response.data)
        })
            .catch(error => {
                setErrorMessages(["Cannot load user data"])
                setIserror(true)
            })
    }, []) // Este array vacío representa una lista vacía de dependencias, solo cuando se monta el componente de ahí a qué deba estar vacío

    //Actualizar campos
    const handleRowUpdate = (newData, oldData, resolve) => {
        axios.put(baseURL + 'ModificarComunicacion/' + newData.id, newData).then(response => {
            if (response.data.message == 'Ha ocurrido un error al actualizar un campo.') {
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

        })
            .catch(error => {
                setErrorMessages(["Update failed! Server error"])
                setIserror(true)
                resolve()

            })
    }

    return (

        <MaterialTable
            title="Comunicaciones"
            columns={columns}
            data={data}
            options={{
                exportButton: true,
                headerStyle: { position: 'sticky', top: 0, fontWeight: 'bold', backgroundColor: blueGrey[50] },
            }}
            localization={{
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
                    searchTooltip: 'Buscar',
                    searchPlaceholder: 'Buscar'
                },
                header: {
                    actions: 'Editar'
                },
            }}

            editable={{
                onRowUpdate: (newData, oldData, rowData, columnDef) =>
                    new Promise((resolve, reject) => {
                        handleRowUpdate(newData, oldData, resolve);
                    }),
            }}
        />
    )

}
export default Comunicaciones;
