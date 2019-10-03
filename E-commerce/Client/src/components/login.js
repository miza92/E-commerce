import React, { Component } from "react";
import { Button, FormGroup, FormControl, FormLabel, } from "react-bootstrap";
import axios from 'axios';
import '../assets/login.css';
import { Container, Row, Col } from 'react-bootstrap';
import { Redirect } from 'react-router-dom';

class Login extends Component {
  constructor(props) {
    super(props);

    this.state = {
      email: "",
      password: "",
      token: "",
      result: ""
    };
  }

  validateForm() {
    return this.state.email.length > 0 && this.state.password.length > 0;
  }

  handleChange = event => {
    this.setState({
      [event.target.id]: event.target.value
    });
  }

  handleSubmit = event => {
    event.preventDefault();
    var headers = {
      'Content-Type': 'application/json'
    }

    var user = {
      email : this.state.email,
      password: this.state.password
    }

    axios.post(`http://localhost:8000/login_check`, user, {headers: headers})
          .then(res => {
            const token = res.data.token;
            this.setState({ token });
            this.props.changeFunction(true);
            if(this.state.token !== " ") {
              
              localStorage.setItem('token',this.state.token);
              this.setState({ result: "Connexion réussie !"  });
              alert(this.state.result);
            }
        })
        .catch(error => {
          console.log(error)
          this.setState({ result: "Mot de passe et/ou email est incorrect"  });
          alert(this.state.result);

      });
  }

  isAuthenticated(){
    const token = localStorage.getItem('token'); 
   
    return token && token.length > 10; 
   }

  render() {
    const isAuthenticated =this.isAuthenticated(); 
    return (
      <div>
      {isAuthenticated ? <Redirect to="/moncompte" /> : (
        <div id="login">
        <form onSubmit= {this.handleSubmit}>
        <p className="nouveau_client">Deja client ?</p>
          <FormGroup controlId="email"  bsSize="large">
            <FormLabel className="label1">E-mail</FormLabel>
            <FormControl
             className="control1"
              autoFocus
              type="email"
              placeholder=".................."
              value={this.state.email}
              onChange={this.handleChange}
            />
          </FormGroup>
          <FormGroup controlId="password" bsSize="large">
            <FormLabel  className="label1">Password</FormLabel>
            <FormControl
            className="control1"
              value={this.state.password}
              onChange={this.handleChange}
              type="password"
              placeholder=".................."
            />
          </FormGroup>
            <p className="confidentialité">En continuant, vous acceptez les Conditions d'utilisation et la Politique de confidentialité de Teck-Box.</p>
          <Button 
            className="button"
            block
            bsSize="large"
            disabled={!this.validateForm()}
            type="submit"
          >
            Identifiez-vous
          </Button>
        </form>
      </div>

      )}
      </div>
    );
  }
}
export default Login;
