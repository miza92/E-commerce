import React, { Component } from 'react';
import { Container } from 'react-bootstrap';
import '../assets/categorie.css';
import { AxiosProvider, Request, Get, Delete, Head, Post, Put, Patch, withAxios, } from 'react-axios';
import axios from 'axios';
import PropTypes from "prop-types";
import TableRow from '@material-ui/core/TableRow';
import ReactList from 'react-list';
import Articles from '../components/articles.js';
import ReactDOM from 'react-dom';
import { BrowserRouter, Link, Route } from 'react-router-dom';



class Categorie extends Component {
  
  constructor(props, id) {
    super(props);
    //this.id = id;
    this.state = {
      category: [],
    };
  }
  
  componentDidMount(){
    axios.get('http://localhost:8000/category')
    .then(response => {
      console.log(response.data);
      this.setState({ 
        category: response.data,
      });
      console.log(this.props);
      
      console.log(response);
    })
    .catch(function (error) {
      console.log(error);
    })
  }  
  
  
  render() {  
    return (
      <div>
      <div className="titre"><p className="test">Categorie</p></div>
      {this.state.category.map((categorie) => {
        return (
          <div>
          <Link to={`/articles/${categorie.id}`}  style={{color: '#20B2AA', textDecoration: 'none'}} key={categorie} >
          <img  className="imagess" src={categorie.picture} alt="indisponible image" width="400px" height="250px" />
             <div className="">{categorie.name}</div>
          </Link>
          </div>
          )
        })}
        </div>
        )
      }
    } 
    export default Categorie;
    