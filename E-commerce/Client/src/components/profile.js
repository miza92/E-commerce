import React, { Component } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';
import '../assets/profile.css';

export default class Profile extends Component {
    constructor(props) {
        super(props)
        this.state = {
            name: '',
            firstname: '',
            email: '',
            adress: '',
            telephone: '',
        }
    }

    componentDidMount() {

        axios.get(`http://localhost:8000/api/profile`)
            .then(res => {
                this.setState({ name: res.data.name })
                this.setState({ firstname: res.data.firstname })
                this.setState({ email: res.data.email })
                this.setState({ adress: res.data.adress })
                this.setState({ telephone: res.data.telephone })
            })
            .catch(error => {
                console.log(error)
            })
    }

    isAuthenticated() {
        const token = localStorage.getItem('token');
        return token && token.length > 10;
    }

    render() {
        const adress = this.state.adress !== null;
        const telephone = this.state.telephone !== null;

        return (
            <div id="profile">
                <h1 style={{ textAlign: 'center' }}>Mon compte</h1>

                <div style={{ margin: '40px', padding: '50px' }}>

                    <Link class="butn" id="right" to={{
                        pathname: "/editUser",
                        aboutProps: {
                            name: this.state.name,
                            firstname: this.state.firstname,
                            email: this.state.email,
                            adress: this.state.adress,
                            telephone: this.state.telephone,
                        }
                    }}>Modifier les informations</Link>
                    <h2>Mes informations</h2>

                    <div>
                        <h4>Prénom :</h4> <p> {this.state.firstname} </p>
                    </div>
                    <div>
                        <h4>Nom de famille :</h4> <p>{this.state.name} </p>
                    </div>
                    <div>
                        <h4>Email :</h4> <p> {this.state.email} </p>
                    </div>
                    <div>
                        <h4>Adresse :</h4>
                        {adress ? (<p>{this.state.adress}</p>) : (
                            <div>
                                <p style={{ padding: "10px" }}>Veuillez complèter votre adresse</p>

                                <Link class="butn" to={{
                                    pathname: "/editUser",
                                    aboutProps: {
                                        name: this.state.name,
                                        firstname: this.state.firstname,
                                        email: this.state.email,
                                        adress: this.state.adress,
                                        telephone: this.state.telephone,
                                    }
                                }} >Modifier</Link>
                            </div>
                        )}
                    </div>
                    <div>
                        <h4> Téléphone :</h4>
                        {telephone ? (<p>{this.state.telephone}</p>) : (
                            <div>
                                <p style={{ padding: "10px" }}>Veuillez complèter votre numéro de téléphone</p>
                                <Link class="butn" to={{
                                    pathname: "/editUser",
                                    aboutProps: {
                                        name: this.state.name,
                                        firstname: this.state.firstname,
                                        email: this.state.email,
                                        adress: this.state.adress,
                                        telephone: this.state.telephone,
                                    }
                                }} >Modifier</Link>
                            </div>
                        )}
                    </div>
                </div>
            </div>
        );
    }
}