import React, { Component } from 'react';
import '../assets/search.css';
import { Container } from 'react-bootstrap';

class Search extends Component {
    render() {
        return (
            <form class="form">
                        <input class="input"
                        ref={input => this.search = input}
                         onChange={this.handleInputChange}
                        />
            <button class="button">Search</button>
            </form>
                
        )
    }
}
export default Search;