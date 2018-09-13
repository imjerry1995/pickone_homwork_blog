import React, { Component } from 'react';

export default class CreateName extends Component{
    render(){
        return (
            <div className="form-group">
                <label htmlFor="name">姓名</label>
                <input type="text" className="form-control" name="name" placeholder="輸入留言姓名"
                        value={this.props.inputName}
                        onChange = {this.props.updateInputName}
                />
            </div>
        );
    }
}

