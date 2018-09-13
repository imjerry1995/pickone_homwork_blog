import React, { Component } from 'react';

export default class RemoveCommentButton extends Component{
    render(){
        return <button onClick={() => {this.props.removeComment(this.props.comment.id)}}> 刪除留言 {this.props.comment.id}</button>;
    }
}
