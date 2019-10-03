import React from 'react';
import { Link, Redirect} from 'react-router-dom';
import axios from 'axios';

export default class Delete extends React.Component 
{
    constructor(props){
        super(props)
        this.state = {
            isDelete: false,
            id: this.props.match.params.id
        }
    }

    delete() {
        axios.delete(`http://localhost:8000/api/admin/category/${this.state.id}`)
        .then(res => {
            alert(res.data.success); 
            this.setState({isDelete: true})
        })
        .catch(error => {
            console.log(error);
        })
    }

    render() {
        if (this.state.isDelete) {
            return <Redirect to={{ pathname: "/admin/categories" }} />;
        } else {
            return(
                <div>
                    <h1>Supprimer la categorie</h1>

                    <p>Voulez-vous supprimer cette categorie ? </p>

                    <div>
                        <button onClick={this.delete()}>Oui</button>
                        <button href="/admin/categories">Non</button>
                    </div>

                </div>
            );
        }
    
    }
}