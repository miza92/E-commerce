import React from 'react'; 
import axios from 'axios'; 
import { Link } from 'react-router-dom';
import '../../../assets/listeCategories.css';

export default class ShowCategories extends React.Component {
    constructor(){
        super()
        this.state = {
            categories: [],
        }
    }
    
    componentDidMount(){
        axios.get('http://localhost:8000/category')
        .then(res => {
            this.setState({ categories: res.data })
            
        })
        .catch(error => {
            console.log(error)
        })
    }
    
    
    render(){
        const categories = this.state.categories
        return(
            <div id="card">
                <h1 style={{textAlign: "center"}}>Listes des categories</h1>
                <div style={{textAlign: "center"}}>
                    <Link class="butn" to={{ pathname:"/admin/categorie/new"}}>Ajouter une categorie</Link>
                </div>
            
                <table className="tableCategorie">
                    <thead>
                        <tr>
                            <td><h3>Id</h3></td>
                            <td><h3>Nom</h3></td>
                            <td><h3>Image</h3></td>
                            <td><h3>Modifier</h3></td>
                            <td><h3>Supprimer</h3></td>
                        </tr>
                    </thead>
                    <tbody>
                        {categories.map(item => (
                            <tr key={item.id}>
                                <td>{item.id}</td>
                                <td>{item.name}</td>
                                <td><img src={item.picture} alt="indisponible image" width="60px" height="60px"/></td>
                                <td><Link className="butn" to={`/admin/categorie/${item.id}/edit`}>Modifier</Link></td>
                                <td><Link className="butn_danger" to={`/admin/categorie/${item.id}/delete`}>Supprimer</Link></td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        ); 
    }
}