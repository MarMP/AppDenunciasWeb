import React from 'react';
import ReactDOM from 'react-dom';
import MenuSuperAdmin from './MenuSuperAdmin';


function IndexSuperAdmin() {
    return (
        <MenuSuperAdmin />
    );
}

export default IndexSuperAdmin; //para poder utilizarlo dentro de otra vista o componente

if (document.getElementById('app')) {
    ReactDOM.render(<IndexSuperAdmin />, document.getElementById('app'));
}


