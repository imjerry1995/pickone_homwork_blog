import React, { Component } from 'react';
import { Link} from 'react-router-dom'; 

export default class CreateCommentButton extends Component {
    render(){
        
        return(
                <button onClick={this.props.createcomment}> 送出 </button>
        );
    }
}
