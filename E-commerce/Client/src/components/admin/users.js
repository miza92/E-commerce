import React, { Component } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';
import '../../assets/listeCategories.css';

export default class Users extends Component {

    constructor(props) {
        super(props)
        this.state = {
            users: [],

        }
    }

    componentDidMount() {

        axios.get(`http://localhost:8000/api/admin/users`)
            .then(res => {
                this.setState({ users: res.data })

            })
            .catch(error => {
                console.log(error)
            })
    }

    render() {
        const users = this.state.users
        return (

            <div id="card">

                <h1 style={{ textAlign: 'center' }}>Listes des utilisateurs</h1>

                <div style={{textAlign: "center"}}>
                    <Link class="butn" id="right" to={{pathname: "/admin/user/new"}}>Creer un user</Link>
                </div>
                <table className="tableCategorie">
                <thead>
                        <tr>
                            <td><h3>Id</h3></td>
                            <td><h3>Prénom</h3></td>
                            <td><h3>Nom</h3></td>
                            <td><h3>Email</h3></td>
                            <td><h3>Adresse complet</h3></td>
                            <td><h3>Telephone</h3></td>
                        </tr>
                    </thead>

                    <tbody>
                        {users.map(item => (
                            <tr key={item.id}>
                                <td>{item.id}</td>
                                <td>{item.firstname}</td>
                                <td>{item.name}</td>
                                <td>{item.email}</td>
                                <td>{item.adress}</td>
                                <td>{item.telephone }</td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        )
    }







}
