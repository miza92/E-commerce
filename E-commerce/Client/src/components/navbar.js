import React, { Component } from 'react';
import '../assets/navbar.css';
import { Container } from 'react-bootstrap';
import Panier from '../assets/panier.png';
import Profil from '../assets/profil.png';
import Infos from '../assets/infos.png';
import Tooltip from "react-simple-tooltip";
import { Nav, Row, Col, Button } from 'react-bootstrap';

class Navbar extends Component {
    render() {
        return (
            <div >
                <nav class="navbar navbar-expand-sm bg-light">
                <h1 class="logo">TECK-BOX</h1>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <Tooltip content="Panier" placement="bottom" background="rgb(53, 56, 47)">
                        <button><a class="nav-link" href="#"><img src={Panier} widht="100" height="50" alt="panier"/></a></button>                           
                        </Tooltip>
                        </li>
                        <li class="nav-item">
                        <Tooltip content="Login/Register" placement="bottom" background="rgb(53, 56, 47)" border="#000" color="#fff">
                        <button><a class="nav-link" href="#"><img src={Profil} widht="100" height="50" alt="profil"/></a></button>
                        </Tooltip>
                        </li>
                        <li class="nav-item">
                        <Tooltip content="Info" placement="bottom" background="rgb(53, 56, 47)" color="#FFF">
                             <a class="nav-link" href="#"><img src={Infos} widht="100" height="50" alt="infos"/></a>
                        </Tooltip>
                        </li>
                </ul>
            </nav>
            <hr></hr>
        </div>
        )
    }
}

export default Navbar;