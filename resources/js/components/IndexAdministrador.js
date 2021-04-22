import React from 'react';
import ReactDOM from 'react-dom';
import MenuAdministrador from './MenuAdministrador';

function IndexAdministrador() {
    return (
        <MenuAdministrador />
    );
}

export default IndexAdministrador; //para poder utilizarlo dentro de otra vista o componente

if (document.getElementById('appAdministrador')) {
    ReactDOM.render(<IndexAdministrador />, document.getElementById('appAdministrador'));
}
