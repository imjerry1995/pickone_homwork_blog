import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import CommentList from './CommentList';
import CreateComment from './CreateComment';
import { BrowserRouter,Route } from 'react-router-dom'; 

export default class CommentApp extends Component {
    
    constructor() {
        super();
        this.state = {
            comments: [],
        };

    }

    // componentDidMount() {
    //     //this.props.showComments(43);
    //     axios.get('/api/comment/' + 43).then((response) => {
    //         this.setState({
    //             comments: response.data
    //         }).catch((errors) => {
    //             console.log(errors);
    //         });
    //     });
    // }


    // shouldComponentUpdate(nextProps, nextState) {
    //     //if (nextState.removeComment !== this.state.comments) {
            
    //         return true;
    //     //}
    // }

    // componentWillUpdate(nextProps, nextState){
    //     console.log(nextState);
    //     return true;
    // }
    

    showComments(postid) {
        axios.get('/api/comment/' + postid)
            .then((response) => {
            this.setState({
                comments: response.data
            }).catch((errors) => {
                console.log(errors);
            });
        });
    }


    removeComment(commentid, postid) {
        axios.delete('/api/comment/' + commentid)
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });

    }

    createcomment(postid,name,content){
        console.log(postid, name, content);
        axios.post('/api/comment/'+ postid, {
                postid: postid,
                name: name,
                content: content,
            }).then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    renderComment(postid){
        return(
            <div className="container">
                <CommentList id={postid} comments={this.state.comments} 
                showComments={postid => this.showComments(postid)}
                removeComment ={postid => this.removeComment(postid)}/ >
                <CreateComment id={postid} comments={this.state.comments} 
                createcomment={(postid,name,content)=>this.createcomment(postid,name,content)}/>
            </div>
        );
        
    }

    render() {
        return (
            <BrowserRouter>
                <Route path="/post/:id" render={({match})=>this.renderComment(match.params.id)}/>
            </BrowserRouter>
        );
    }
}

if (document.getElementById('comment')) {
    ReactDOM.render(<CommentApp />, document.getElementById('comment'));
}

