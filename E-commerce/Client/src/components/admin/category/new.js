import React, { Component } from "react";
import { Button, FormGroup, FormControl, FormLabel } from "react-bootstrap";
import '../../../assets/editUser.css';
import Footer from '../../footer.js';
import axios from 'axios';
import { Link } from 'react-router-dom';
import { Redirect } from 'react-router';
import Select from 'react-select';

export default class NewCategory extends Component {

    constructor(props) {
        super(props);

        this.state = {
            name: "",
            image: "", 
            addCategorie: false
        };
    }

    validateForm() {
        return (this.state.name.length > 0 && this.state.image.length > 0);
    }

    handleChange = event => {
        this.setState({
            [event.target.id]: event.target.value
        });
    }


    handleSubmit = event => {
        event.preventDefault();
        const category = {
            name: this.state.name,
            image: this.state.image,
        };

        axios.post(`http://127.0.0.1:8000/api/admin/category/new`, category)
            .then(res => {
                alert(res.data.success);                console.log(res.data.success);
                this.setState({addCategorie: true})
            })
            .catch(error => {
                console.log(error)
            });
    }

    render() {
        
                if (this.state.addCategorie) {
                    return <Redirect to={{ pathname: "/admin/categories" }} />;
                } else {
                    return (
                        <div>
                            
                            <div id="newUser">

                            <div>
                            <Link class="butn" to={{ pathname:"/admin/categories"}}>Retour</Link>
                            </div>

                            
                            <h1>Nouvelle catégorie</h1>

                            <form onSubmit={this.handleSubmit} >
                                <FormGroup controlId="name" bsSize="large">
                                    <FormLabel className="label">Nom du categorie</FormLabel>
                                    <FormControl
                                        className="control"
                                        autoFocus
                                        type="text"
                                        value={this.state.name}
                                        onChange={this.handleChange}
                                    />
                                </FormGroup>

                                <FormGroup controlId="image" bsSize="large">
                                    <FormLabel className="label">Image (URL)</FormLabel>
                                    <FormControl
                                        className="control"
                                        value={this.state.image}
                                        onChange={this.handleChange}
                                        type="text"

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
                    </div>
                    );
                }
    }


}