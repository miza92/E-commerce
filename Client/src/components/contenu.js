import React, { Component } from 'react';
import '../assets/contenu.css';
import { BrowserRouter, Link, Route } from 'react-router-dom';
import Categorie from './categorie.js';
import Nouveauté from './nouveauté.js';
import Coeur from './coeur.js';
import Contact from './contact.js';

class Contenu extends Component {
    render() {
        return (
          //  <BrowserRouter>
             <div >
              <nav class="navbar navbar-expand-sm bg-light">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <Link to="/categorie" style={{color: '#20B2AA', textDecoration: 'none'}}><p className="categorie">Categorie</p></Link>
                  </li>
                  <li class="nav-item">
                    <Link to="/nouveauté" style={{color: '#20B2AA', textDecoration: 'none'}}><p className="nouveauté">Nouveauté du mois</p></Link>
                  </li>
                  <li class="nav-item">
                    <Link to="/coeur" style={{color: '#20B2AA', textDecoration: 'none'}}><p className="coup_de_coeur">Notre selection du moment</p></Link>
                  </li>
                  <li class="nav-item">
                    <Link to="/contact" style={{color: '#20B2AA', textDecoration: 'none'}}><p className="contact">Nous contacter</p></Link>
                  </li>
                  </ul>
              </nav>
        </div>
      // </BrowserRouter>
        )
    }
}  
export default Contenu;