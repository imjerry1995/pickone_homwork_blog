import React, { Component } from 'react';

export default class Comment extends Component{
    render(){
        const { comment } = this.props; 
        return(
            <div>
                <div className="name">{comment.name}</div>
                <div className="time">{comment.created_at}</div>
                <hr />
                <div className="content">
                    {comment.content}
                </div>
            </div>
        );
    }
}