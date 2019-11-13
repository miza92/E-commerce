import React, { Component } from "react";
import { Button, FormGroup, FormControl, FormLabel } from "react-bootstrap";
import '../assets/editUser.css';
import Footer from './footer.js';
import axios from 'axios';
import { Link } from 'react-router-dom';
import { Redirect } from 'react-router'

export default class Edit_user extends Component {

    constructor(props) {
        super(props);

        const dataProps = props.location.aboutProps;

        console.log(dataProps);

        this.state = {
            firstname: dataProps.firstname,
            name: dataProps.name,
            email: dataProps.email,
            password: "",
            newpassword: "",
            adress: dataProps.adress,
            telephone: dataProps.telephone,
            isModify: false // <-- initialize the signup state as false
        };


        console.log(props.location.aboutProps);
    }


    validateForm() {
        const { password, newpassword } = this.state;
        if (newpassword !== "" && password !== newpassword) {
            this.setState({ password: newpassword })
        }

        return (this.state.firstname.length > 0 &&
            this.state.name.length > 0 &&
            this.state.email.length > 0 &&
            this.state.password.length > 0

        );
    }

    handleChange = event => {
        this.setState({
            [event.target.id]: event.target.value
        });
    }


    isAuthenticated() {
        const token = localStorage.getItem('token');
        return token && token.length > 10;
    }



    handleSubmit = event => {
        event.preventDefault();
        const user = {
            firstname: this.state.firstname,
            name: this.state.name,
            email: this.state.email,
            adress: this.state.adress,
            telephone: this.state.telephone,
            password: this.state.password,

        };


        axios.post(`http://127.0.0.1:8000/api/edit`, user)
            .then(res => {
                this.setState({ isModify: true });
                alert("Données Modifier avec succès !");
                console.log(res.data);

            })
            .catch(error => {
                console.log(error)
                this.setState({ result: "L'e-mail " });
                alert(this.state.result);
            });
    }



    render() {
        if (this.state.isModify) {
            return <Redirect to={{ pathname: "/moncompte" }} />;
        } else {
            return (
                <div id="editUser">
                    <h1>Modifier mes données</h1>

                    <form onSubmit={this.handleSubmit} >
                        <FormGroup controlId="firstname" bsSize="large">
                            <FormLabel className="label">Prenom</FormLabel>
                            <FormControl
                                className="control"
                                autoFocus
                                type="text"
                                value={this.state.firstname}
                                onChange={this.handleChange}
                            />
                        </FormGroup>

                        <FormGroup controlId="name" bsSize="large">
                            <FormLabel className="label">Nom</FormLabel>
                            <FormControl
                                className="control"
                                value={this.state.name}
                                onChange={this.handleChange}
                                type="text"

                            />
                        </FormGroup>
                        <FormGroup controlId="email" bsSize="large">
                            <FormLabel className="label">E-mail</FormLabel>
                            <FormControl
                                className="control"
                                autoFocus
                                type="email"
                                placeholder=".................."
                                value={this.state.email}
                                onChange={this.handleChange}
                            />
                        </FormGroup>
                        <FormGroup controlId="password" bsSize="large">
                            <FormLabel className="label">Password</FormLabel>
                            <FormControl
                                className="control"
                                value={this.state.password}
                                onChange={this.handleChange}
                                type="password"

                            />
                        </FormGroup>

                        <FormGroup controlId="newpassword" bsSize="large">
                            <FormLabel className="label">New Password</FormLabel>
                            <FormControl
                                className="control"
                                value={this.state.newpassword}
                                onChange={this.handleChange}
                                type="password"

                            />
                        </FormGroup>

                        <FormGroup controlId="adress" bsSize="large">
                            <FormLabel className="label">Adress</FormLabel>
                            <FormControl
                                className="control"
                                value={this.state.adress}
                                onChange={this.handleChange}
                                type="text"

                            />
                        </FormGroup>

                        <FormGroup controlId="telephone" bsSize="large">
                            <FormLabel className="label">Telephone</FormLabel>
                            <FormControl
                                className="control"
                                value={this.state.telephone}
                                onChange={this.handleChange}
                                type="number"
                            />
                        </FormGroup>

                        <Button
                            className="button"
                            block
                            bsSize="large"
                            disabled={!this.validateForm()}
                            type="submit"
                        >
                            Valider
                        </Button>


                    </form>
                </div>
            );
        }
    }


}