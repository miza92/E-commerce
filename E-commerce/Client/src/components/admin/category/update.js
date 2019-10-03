import React, { Component } from "react";
import { Button, FormGroup, FormControl, FormLabel } from "react-bootstrap";
import '../../../assets/editUser.css';
import Footer from '../../footer.js';
import axios from 'axios';
import { Link } from 'react-router-dom';
import { Redirect } from 'react-router';
import Select from 'react-select';

export default class UpdateCategory extends Component {

    constructor(props) {
        super(props);

        this.state = {
            name: "",
            image: "", 
            editCategorie: false, 
            id: this.props.match.params.id
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

        axios.post(`http://127.0.0.1:8000/api/admin/category/${this.state.id}/edit`, category)
            .then(res => {
                alert(res.data.success);
                this.setState({editCategorie: true})
            })
            .catch(error => {
                console.log(error)
            });
    }

    render() {
        if (this.state.editCategorie) {
            return <Redirect to={{ pathname: "/admin/categories" }} />;
        } else {
            return (
                <div>   
                    <div id="newUser">
                        <div>
                            <Link class="butn" to={{ pathname:"/admin/categories"}}>Retour</Link>
                        </div>
                            <h1>Modifier une catégorie</h1>
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