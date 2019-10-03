import React, { Component } from 'react'; 
import { Container } from 'react-bootstrap';
import axios from 'axios'; 

export default class Info extends React.Component {
    
    componentDidMount() {
        axios.get(`http://localhost:8000/profile`)
        .then(res => {
            console.log(res.data);
        })
        .catch(error => {
            console.log(error);
        })

    }
        
        render(){
            return (
                <div>
                <h1>hello</h1>
                </div>
                )
            }
        }