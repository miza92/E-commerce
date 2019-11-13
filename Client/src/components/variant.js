import React, { Component } from 'react';
import { Container } from 'react-bootstrap';
import { AxiosProvider, Request, Get, Delete, Head, Post, Put, Patch, withAxios, } from 'react-axios';
import axios from 'axios';
import PropTypes from "prop-types";
import TableRow from '@material-ui/core/TableRow';
import ReactList from 'react-list';
import { BrowserRouter, Link, Route } from 'react-router-dom';

class Variant extends Component {
  
  constructor(props) {
    super(props);
    this.state = {
     variant: [],
      id: this.props.match.params.id
    }
  }
  
  componentDidMount(){
    axios.get(`http://localhost:8000/produit/${this.state.id}/variant`)
    .then(response => {
      console.log("data", response.data);
      this.setState({ 
        variant: response.data });
      })
      .catch(function (error) {
        console.log(error);
      })
  }  
        
  render() {
    return (      
    <div >
    <p>Faite votre choix</p>
    {this.state.variant.map((variante) =>{
      return (
        <div>
        <Link to={`/variant/${variante.id}`} style={{color: '#20B2AA', textDecoration: 'none'}} key={variante} >
        {variante.name}
        </Link>
        <img  src={variante.picture} alt="indisponible image" width="350px" height="250px"/>
        </div>
      )        
    })}
    </div>
    )    
  }
} 
export default Variant;