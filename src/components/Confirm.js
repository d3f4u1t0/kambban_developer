import React, { Component } from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import {List, ListItem} from 'material-ui/List';
import RaisedButton from 'material-ui/RaisedButton';


export class Confirm extends Component {
    continue = e => {
        e.preventDefault();
        this.props.nextStep();
    }

    previous = e => {
        e.preventDefault();
        this.props.prevStep();
    }


    render () {
        const{ values } = this.props;

        return (
            <MuiThemeProvider  >
                <React.Fragment >
      
                    <List >
                        <ListItem 
                            primaryText="Category Type"
                            secondaryText= {values.categoryType}
                        />

                        <ListItem 
                            primaryText="Request Type"
                            secondaryText= {values.requestType}
                        />

                         <ListItem 
                            primaryText="Description"
                            secondaryText = {values.description}
                        />

                    </List>

                    <RaisedButton 
                        label="Return"
                        secondary={true}
                        style={styles.button}
                        onClick={this.previous}
                       
                    />
                    <RaisedButton 
                        label="Confirm"
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
    

export default Confirm;