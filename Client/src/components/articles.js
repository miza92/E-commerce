import React, { Component } from 'react';
import { Container } from 'react-bootstrap';
import { AxiosProvider, Request, Get, Delete, Head, Post, Put, Patch, withAxios, } from 'react-axios';
import axios from 'axios';
import PropTypes from "prop-types";
import TableRow from '@material-ui/core/TableRow';
import ReactList from 'react-list';
import { BrowserRouter, Link, Route } from 'react-router-dom';

class Articles extends Component {
  
  constructor(props) {
    super(props);
    this.state = {
      articles: [],
      id: this.props.match.params.id
    }
  }

  
  componentDidMount(){
    //console.log("here", this.state.id);
    axios.get(`http://localhost:8000/category/${this.state.id}/article`)
    .then(response => {
      console.log("data", response.data);
      this.setState({ 
        articles: response.data });
        
        //console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      })
    }  
    
    
    render() {
      return (      
     <div >
       <div className="titre"><p className="test">Articles</p></div>
     {this.state.articles.map((articless) =>{
       return (
         <div>
         <Link to={`/produit/${articless.id}`} style={{color: '#20B2AA', textDecoration: 'none'}} key={articless} >
         {articless.name}
         </Link>
         <img  className="imagess" src={articless.picture} alt="indisponible image" width="350px" height="250px"/>
         </div>
         )
         
       })}
       </div>
       )
       
     }
   } 
      export default Articles;