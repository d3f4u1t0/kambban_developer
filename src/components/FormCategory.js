import React, { Component } from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import { FormControl } from '@material-ui/core';
import InputLabel from '@material-ui/core/InputLabel';
import RaisedButton from 'material-ui/RaisedButton';
import Select from '@material-ui/core/Select';
import { MenuItem } from 'material-ui';


export class FormCategory extends Component {

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

            <MuiThemeProvider >

            <FormControl >

                    <InputLabel> Tipo de categoría </InputLabel>

                    <Select
                        style={styles.select}
                        onChange={handleChange('categoryType')} 
                        value={values.categoryType} 
                        defaultValue={values.categoryType}
                    > 

                        <MenuItem id={1} value={'desarrollo'}>Desarrollo</MenuItem>
                        <MenuItem id={2} value={'soporte'}>Soporte</MenuItem>
                    </Select>

                </FormControl>
     
                    <br />

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
        margin: 15,
    },

    select: {
        
        minWidth: '200px'
    }
    
}

export default FormCategory;
