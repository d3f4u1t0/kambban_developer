import React, { Component } from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import TextField from 'material-ui/TextField';
import RaisedButton from 'material-ui/RaisedButton';


export class FormDescription extends Component {

    continue = e => {
        e.preventDefault();
        this.props.nextStep();
    }

    previous = e => {
        e.preventDefault();
        this.props.prevStep();
    }

    


    render () {
        
        const{ values, handleChange } = this.props;

        return (
            <MuiThemeProvider  >
                <React.Fragment >
                    
                    <TextField 
                        floatingLabelText="Describe us your problem"
                        onChange={handleChange('description')}
                        defaultValue={values.description}
                        style={styles.input}
                    />
                    <br />

                    <RaisedButton 
                        label="Volver"
                        secondary={true}
                        style={styles.button}
                        onClick={this.previous}
                       
                    />
                    <RaisedButton 
                        label="Continuar"
                        primary={true}
                        style={styles.button}
                        onClick={this.continue}
                       
                    />
                        
                </React.Fragment>
            </MuiThemeProvider>
        )
    }
}

const styles = {
    button: {
        margin: 15
    },

    
    


}
    

export default FormDescription;
