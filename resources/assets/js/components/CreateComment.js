import React, { Component } from 'react';
import CreateName from './CreateName';
import CreateCommentContent from './CreateCommentContent';
import CreateCommentButton from './CreateCommentButton';

export default class CreateComment extends Component {

    constructor() {
        super();
        this.state ={
            inputName: '',
            inputContent: ''
        };
    }

    createcomment() {
        if (this.state.inputName || this.state.inputContent) {

            this.props.createcomment &&
                this.props.createcomment(this.props.id,this.state.inputName, this.state.inputContent);
            //新增完資料後清空
            this.setState({
                inputName: '',
                inputContent: ''
            });
        }
    }

    updateInputName(event){
        this.setState({
            inputName: event.target.value,
        });
    }

    updateInputContent(event) {
        this.setState({
            inputContent: event.target.value,
        });
    }
    
    render(){
        return(
            <div>
                <CreateName inputName={this.state.inputName} updateInputName={(event)=>this.updateInputName(event)}/>
                <CreateCommentContent inputContent={this.state.inputContent} updateInputContent={(event)=>this.updateInputContent(event)}/>
                <CreateCommentButton createcomment={()=> this.createcomment()}/>
            </div>
        );
    }
}

