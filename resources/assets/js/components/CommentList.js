import React, { Component } from 'react';
import Comment from './Comment';
import RemoveCommentButton from './RemoveCommentButton';

export default class CommentList extends Component{

    componentDidMount() {
        this.props.showComments(this.props.id);
    }

    removeComment(comment) {
        this.props.removeComment && this.props.removeComment(comment);
    }

    render(){
        return(
            this.props.comments.map((comment, index) => {
                return (
                    <div>
                        <Comment key={index} comment={comment} />
                        <RemoveCommentButton comment={comment} removeComment={(comment)=>this.removeComment(comment)}/>
                    </div>
                );
            })
            
        );
    }
}




                
                
