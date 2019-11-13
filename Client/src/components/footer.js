import React, { Component } from 'react';
import '../assets/footer.css';
import { BrowserRouter, Link, Route, } from 'react-router-dom';


class Footer extends Component {
    render() {
        return (
           //<BrowserRouter>
             <div>
              <nav className="expand-sm bg-light">
                <ul className="navbar-nav1">
                  <li className="nav-item1">
                    <Link to="/conditions_d'utilisation" style={{color: 'rgb(53, 56, 47)', textDecoration: 'none'}}><p className="footer">Conditions d'utilisation</p></Link>
                  </li>
                  <li className="nav-item1">
                    <Link to="/protection_de_vos_informations_personnelles" style={{color: 'rgb(53, 56, 47)', textDecoration: 'none'}}><p className="footer">Protection de vos informations personnelles </p></Link>
                  </li>
                  <li className="nav-item1">
                    <Link to="/aide" style={{color: 'rgb(53, 56, 47)', textDecoration: 'none'}}><p className="footer">Aide</p></Link>
                  </li>
                  <li className="nav-item1">
                    <Link to="/centres_d’intérêt" style={{color: 'rgb(53, 56, 47)', textDecoration: 'none'}}><p className="footer">Annonces basées sur vos centres d’intérêt </p></Link>
                  </li>
                  </ul>
              </nav>
                <h3 className="inc">© 1996-2019, tech-box.com, Inc. Dépensez vos soues.</h3>
        </div>
      //</BrowserRouter>//
        )
    }
}

export default Footer;