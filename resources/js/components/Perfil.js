import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Grid from '@material-ui/core/Grid';
import Paper from '@material-ui/core/Paper';
import TextField from '@material-ui/core/TextField';
import Typography from '@material-ui/core/Typography';
import IconButton from '@material-ui/core/IconButton';
import InputAdornment from '@material-ui/core/InputAdornment';
import Visibility from '@material-ui/icons/Visibility';
import VisibilityOff from '@material-ui/icons/VisibilityOff';
import Accordion from '@material-ui/core/Accordion';
import AccordionSummary from '@material-ui/core/AccordionSummary';
import AccordionDetails from '@material-ui/core/AccordionDetails';
import ExpandMoreIcon from '@material-ui/icons/ExpandMore';
import DateFnsUtils from '@date-io/date-fns';
import {
  MuiPickersUtilsProvider,
  KeyboardDatePicker,
} from '@material-ui/pickers';

import Button from '@material-ui/core/Button';
import blueGrey from '@material-ui/core/colors/blueGrey';

const useStyles = makeStyles((theme) => ({
    root: {
        '& .MuiTextField-root': {
            margin: theme.spacing(2),
            width: '35ch',
        },
        '& .MuiButton-root': {
            margin: theme.spacing(2),
        },
        '& .MuiTypography-root': {
            padding: theme.spacing(2)
        }
    },
}));

function Perfil() {

    const classes = useStyles();
    const [values, setValues] = React.useState({
        amount: '',
        password: '',
        weight: '',
        weightRange: '',
        showPassword: false,
    });
    const handleChange = (prop) => (event) => {
        setValues({ ...values, [prop]: event.target.value });
    };

    const handleClickShowPassword = () => {
        setValues({ ...values, showPassword: !values.showPassword });
    };

    const handleMouseDownPassword = (event) => {
        event.preventDefault();
    };
    const [selectedDate, setSelectedDate] = React.useState(new Date('2019-07-07T21:11:54'));

    const handleDateChange = (date) => {
      setSelectedDate(date);
    };

    return (
        <div className={classes.root}>
            <form noValidate autoComplete="off">
                <Grid container spacing={3}>
                    <Grid item xs={12}>
                        <Paper className={classes.paper}>
                            <Typography variant="h5" component="h4">
                                Información básica
                            </Typography>
                            <TextField
                                disabled
                                id="outlined-disabled"
                                label="Nombre"
                                defaultValue="Hello World"
                                variant="outlined"
                            />
                            <TextField
                                required
                                id="outlined-required"
                                label="Apellidos"
                                defaultValue="Hello World"
                                variant="outlined"
                            />
                            <TextField
                                id="outlined-read-only-input"
                                label="Departamento"
                                defaultValue="Hello World"
                                InputProps={{
                                    readOnly: true,
                                }}
                                variant="outlined"
                            />
                            <TextField
                                disabled
                                id="outlined-disabled"
                                label="Email"
                                defaultValue="Hello World"
                                variant="outlined"
                            />
                            <TextField
                                disabled
                                id="outlined-disabled"
                                label="Usuario"
                                defaultValue="Hello World"
                                variant="outlined"
                            />
                            <MuiPickersUtilsProvider utils={DateFnsUtils}>
                            <KeyboardDatePicker
                                id="date-picker-dialog"
                                label="Fecha de nacimiento"
                                format="dd/MM/yyyy"
                                value={selectedDate}
                                onChange={handleDateChange}
                                KeyboardButtonProps={{
                                    'aria-label': 'change date',
                                }}
                                inputVariant="outlined"
                            />
                            </MuiPickersUtilsProvider>
                            <TextField
                                required
                                id="outlined-required"
                                label="Dirección"
                                defaultValue="C/Redonda"
                                variant="outlined"
                            />
                            <TextField
                                required
                                id="outlined-required"
                                label="Provincia"
                                defaultValue="Almería"
                                variant="outlined"
                            />
                            <TextField
                                required
                                id="outlined-required"
                                label="Ciudad"
                                defaultValue="Almería"
                                variant="outlined"
                            />
                            <TextField
                                required
                                id="outlined-required"
                                label="Código postal"
                                defaultValue="04006"
                                variant="outlined"
                            />
                            <TextField
                                required
                                id="outlined-required"
                                label="Teléfono"
                                defaultValue="950-000-000"
                                variant="outlined"
                            />
                            <Button variant="contained" color="primary" style={{backgroundColor: blueGrey[600]}}>
                                Guardar cambios
                            </Button>
                        </Paper>
                    </Grid>

                    <Grid item xs={12} sm={12}>
                        <Accordion>
                            <AccordionSummary
                                expandIcon={<ExpandMoreIcon />}
                                aria-controls="panel1a-content"
                                id="panel1a-header"
                            >
                                <Typography variant="h5" component="h4">Cambiar contraseña</Typography>
                            </AccordionSummary>
                            <AccordionDetails>
                                <TextField
                                    required
                                    id="outlined-password-input"
                                    type= "password"
                                    label="Contraseña actual"
                                    variant="outlined"
                                    style={{ width: '70%' }}
                                />
                                <TextField
                                    required
                                    id="outlined-adornment-password"
                                    type={values.showPassword ? 'text' : 'password'}
                                    /*value={values.password} */
                                    label="Nueva contraseña"
                                    variant="outlined"
                                    style={{ width: '70%' }}
                                    onChange={handleChange('password')}
                                    InputProps={{
                                        endAdornment: (
                                            <InputAdornment position="end">
                                                <IconButton
                                                    aria-label="toggle password visibility"
                                                    onClick={handleClickShowPassword}
                                                    onMouseDown={handleMouseDownPassword}
                                                    edge="end"
                                                >
                                                    {values.showPassword ? <Visibility /> : <VisibilityOff />}
                                                </IconButton>
                                            </InputAdornment>
                                        )
                                    }}
                                />
                                <TextField
                                    required
                                    id="outlined-adornment-password"
                                    type={values.showPassword ? 'text' : 'password'}
                                    /*value={values.password}*/
                                    label="Confirmar nueva contraseña"
                                    variant="outlined"
                                    style={{ width: '70%' }}
                                    onChange={handleChange('password')}
                                    InputProps={{
                                        endAdornment: (
                                            <InputAdornment position="end">
                                                <IconButton
                                                    aria-label="toggle password visibility"
                                                    onClick={handleClickShowPassword}
                                                    onMouseDown={handleMouseDownPassword}
                                                    edge="end"
                                                >
                                                    {values.showPassword ? <Visibility /> : <VisibilityOff />}
                                                </IconButton>
                                            </InputAdornment>
                                        )
                                    }}
                                />
                                <Button variant="contained" color="primary" style={{backgroundColor: blueGrey[600]}}>
                                    Guardar cambios
                                </Button>
                            </AccordionDetails>
                        </Accordion>
                    </Grid>
                </Grid>
            </form>
        </div>

    );


}

export default Perfil;
