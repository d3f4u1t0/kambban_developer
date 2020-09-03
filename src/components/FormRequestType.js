import React, { Component } from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import { FormControl } from '@material-ui/core';
import InputLabel from '@material-ui/core/InputLabel';
import RaisedButton from 'material-ui/RaisedButton';
import Select from '@material-ui/core/Select';
import { MenuItem } from 'material-ui';




export class FormRequestType extends Component {

    continue = e => {
        e.preventDefault();
        this.props.nextStep();
    }

    previous = e => {
        e.preventDefault();
        this.props.prevStep();
    }


    render() {

        const{ values, handleChange} = this.props;

        return (

            <MuiThemeProvider  >
               

                <FormControl >

                    <InputLabel> ¿Que necesitas? </InputLabel>

                    <Select
                        style={styles.select}
                      
                        onChange={handleChange('requestType')} 
                        value={values.requestType}
                        
                    > 

                        <MenuItem id={1} value={'pregunta'}>Pregunta</MenuItem>
                        <MenuItem id={2} value={'queja'}>Queja</MenuItem>
                        <MenuItem id={3} value={'respuesta'}>Respuesta</MenuItem>
                    </Select>

                </FormControl>
     
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
                        
              
            </MuiThemeProvider>
        )
    }
}

const styles = {
    button: {
        margin: 15
    },

    select: {
        
        minWidth: '200px'
    }


}

export default FormRequestType;
