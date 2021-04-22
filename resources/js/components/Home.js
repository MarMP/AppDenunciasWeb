import React, { useEffect } from "react";

const Home = props => {
    useEffect(() => {
        document.title = "Home";
    });
    return (

        <header class="masthead text-right">
            <div class="overlay"></div>
            <div class="container-fluid pl-5" >
                <div class="row justify-content-center align-items-center vh-100">
                    <div class="col-xl-11 mx-auto">
                        <h1 class="mb-2 text-uppercase text-white"><strong>Bienvenido a APPDenuncias
                            <hr class="bg-white"></hr></strong>
                        </h1>
                        <h2 class="text-white">Gestión y recursos</h2>
                    </div>
                </div>
            </div>
        </header>
    )
};

export default Home;
