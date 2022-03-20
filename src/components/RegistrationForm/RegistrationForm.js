import { Divider, Container, Header, Input, Form, Grid, Dropdown, Icon } from 'semantic-ui-react';
import './style.sass';

import { useForm } from 'react-hook-form';

const genderOptions = [
    {
        key: 'male',
        value: 'male',
        text: 'Мужской'
    },
    {
        key: 'female',
        value: 'female',
        text: 'Женский'
    }
];

const RegistrationForm = () => {
    return (
        <Container textAlign = "center">
            <Header as = "h1" color = "grey">РЕГИСТРАЦИЯ</Header>
            <Divider inverted section/>
            <Form>
                    <Grid divided = "vertically">
                    <Grid.Row columns = "2">
                        <Grid.Column width = "8">
                            <Input transparent inverted placeholder = "Имя"/>
                        </Grid.Column>
                        <Grid.Column width = "8">
                            <Input transparent inverted placeholder = "Фамилия"/>
                        </Grid.Column>
                    </Grid.Row>
                    <div className = 'ui calendar' id = 'birth-date'>
                        <Input transparent inverted type="date" placeholder="Date/Time" />
                    </div>
                </Grid>
            </Form>
        </Container>
    );
}
export default RegistrationForm;