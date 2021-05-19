import React, { useEffect } from "react";

const Home = props => {
    useEffect(() => {
        document.title = "Home";
    });
    return (

        <header className="masthead text-right">
            <div className="overlay"></div>
            <div className="container-fluid pl-5" >
                <div className="row justify-content-center align-items-center vh-100">
                    <div className="col-xl-11 mx-auto">
                        <h1 className="mb-2 text-uppercase text-white"><strong>Bienvenido a APPDenuncias
                            <hr className="bg-white"></hr></strong>
                        </h1>
                        <h2 className="text-white">Gestión y recursos</h2>
                    </div>
                </div>
            </div>
        </header>
    )
};

export default Home;
