import React, { Component } from 'react';

export default class CreateCommentContent extends Component{
    render(){
        return (
            <div className="form-group">
                <label htmlFor="content">留言</label>
                <textarea className="form-control" rows="3" name="content" value={this.props.inputContent}
                    onChange = {this.props.updateInputContent}
                ></textarea>
            </div>
        );
    }
}

