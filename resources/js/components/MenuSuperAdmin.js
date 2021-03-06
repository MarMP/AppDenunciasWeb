import React from 'react';
import clsx from 'clsx';
import { makeStyles, useTheme } from '@material-ui/core/styles';
import Drawer from '@material-ui/core/Drawer';
import AppBar from '@material-ui/core/AppBar';
import Toolbar from '@material-ui/core/Toolbar';
import CssBaseline from '@material-ui/core/CssBaseline';
import Divider from '@material-ui/core/Divider';
import IconButton from '@material-ui/core/IconButton';
import MenuIcon from '@material-ui/icons/Menu';
import ChevronLeftIcon from '@material-ui/icons/ChevronLeft';
import ChevronRightIcon from '@material-ui/icons/ChevronRight';
import List from '@material-ui/core/List';
import ListItem from '@material-ui/core/ListItem';
import ListItemIcon from '@material-ui/core/ListItemIcon';
import ListItemText from '@material-ui/core/ListItemText';
import HomeIcon from '@material-ui/icons/Home';
import AccountCircleIcon from '@material-ui/icons/AccountCircle';
import EventIcon from '@material-ui/icons/Event';
import WorkIcon from '@material-ui/icons/Work';
import ReportProblemIcon from '@material-ui/icons/ReportProblem';
import PeopleIcon from '@material-ui/icons/People';
import AssignmentIcon from '@material-ui/icons/Assignment';
import ForumIcon from '@material-ui/icons/Forum';
import ExitToAppIcon from '@material-ui/icons/ExitToApp';
import blueGrey from '@material-ui/core/colors/blueGrey';
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link
} from 'react-router-dom';
import Departamento from './Departamento';
import TipoComunicacion from './TipoComunicacion';
import GestionEmpleados from './GestionEmpleados';
import GestionAdministradores from './GestionAdministradores';
import Comunicaciones from './Comunicaciones';
import Home from './Home';
import Perfil from './Perfil';


const drawerWidth = 240;

const useStyles = makeStyles((theme) => ({
    root: {
        display: 'flex',
    },
    appBar: {
        zIndex: theme.zIndex.drawer + 1,
        transition: theme.transitions.create(['width', 'margin'], {
            easing: theme.transitions.easing.sharp,
            duration: theme.transitions.duration.leavingScreen,
        }),
    },
    appBarShift: {
        marginLeft: drawerWidth,
        width: `calc(100% - ${drawerWidth}px)`,
        transition: theme.transitions.create(['width', 'margin'], {
            easing: theme.transitions.easing.sharp,
            duration: theme.transitions.duration.enteringScreen,
        }),
    },
    menuButton: {
        marginRight: 36,
    },
    hide: {
        display: 'none',
    },
    drawer: {
        width: drawerWidth,
        flexShrink: 0,
        whiteSpace: 'nowrap',
    },
    drawerOpen: {
        width: drawerWidth,
        transition: theme.transitions.create('width', {
            easing: theme.transitions.easing.sharp,
            duration: theme.transitions.duration.enteringScreen,
        }),
    },
    drawerClose: {
        transition: theme.transitions.create('width', {
            easing: theme.transitions.easing.sharp,
            duration: theme.transitions.duration.leavingScreen,
        }),
        overflowX: 'hidden',
        width: theme.spacing(7) + 1,
        [theme.breakpoints.up('sm')]: {
            width: theme.spacing(9) + 1,
        },
    },
    toolbar: {
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'flex-end',
        padding: theme.spacing(0, 1),
        // necessary for content to be below app bar
        ...theme.mixins.toolbar,
    },
    content: {
        flexGrow: 1,
        padding: theme.spacing(3),
    },
}));

function MenuSuperAdmin() {

    const classes = useStyles();
    const theme = useTheme();
    const [open, setOpen] = React.useState(false);

    const handleDrawerOpen = () => {
        setOpen(true);
    };

    const handleDrawerClose = () => {
        setOpen(false);
    };

    /*M??todo para cerrar sesi??n */
    const logout = () => {
        localStorage.clear();
        window.location.href = 'http://127.0.0.1:8000/logout';
    };
    /* Mi perfil */
    const miPerfil = () => {
        window.location.href = 'http://127.0.0.1:8000/mi-perfil';
    }

    return (
        <Router>
            <div className={classes.root}>
            <CssBaseline />
            <AppBar
                position="fixed"
                style={{backgroundColor: blueGrey[50]}}
                className={clsx(classes.appBar, {
                [classes.appBarShift]: open,
                })}
            >
                <Toolbar>
                <IconButton
                    color="inherit"
                    aria-label="open drawer"
                    onClick={handleDrawerOpen}
                    edge="start"
                    className={clsx(classes.menuButton, {
                    [classes.hide]: open,
                    })}
                >
                    <MenuIcon />
                </IconButton>
                    <img src="../images/logoNav2.png" alt="logo" className={classes.logo} />
                </Toolbar>
            </AppBar>
            <Drawer
                variant="permanent"
                className={clsx(classes.drawer, {
                [classes.drawerOpen]: open,
                [classes.drawerClose]: !open,
                })}
                classes={{
                paper: clsx({
                    [classes.drawerOpen]: open,
                    [classes.drawerClose]: !open,
                }),
                }}
            >
                <div className={classes.toolbar}>
                <IconButton onClick={handleDrawerClose}>
                    {theme.direction === 'rtl' ? <ChevronRightIcon /> : <ChevronLeftIcon />}
                </IconButton>
                </div>
                <Divider />
                <List>
                    <Link to="/home" style={{ textDecoration: 'none', color: theme.palette.text.primary }}>
                        <ListItem button>
                            <ListItemIcon>
                                <HomeIcon />
                            </ListItemIcon>
                            <ListItemText primary={"Home"}/>
                        </ListItem>
                    </Link>

                    <ListItem button onClick = {miPerfil}>
                        <ListItemIcon>
                            <AccountCircleIcon />
                        </ListItemIcon>
                        <ListItemText primary={"Mi Perfil"} />
                    </ListItem>

                    <Divider />

                    <Link to="/comunicaciones" style={{ textDecoration: 'none', color: theme.palette.text.primary }}>
                        <ListItem button>
                            <ListItemIcon>
                                <ForumIcon />
                            </ListItemIcon>
                            <ListItemText primary={"Comunicaciones"}/>
                        </ListItem>
                    </Link>

                    <Link to="/gestionAdministradores" style={{ textDecoration: 'none', color: theme.palette.text.primary }}>
                        <ListItem button>
                            <ListItemIcon>
                                <AssignmentIcon />
                            </ListItemIcon>
                            <ListItemText primary={"Administradores"}/>
                        </ListItem>
                    </Link>

                    <Link to="/gestionEmpleados" style={{ textDecoration: 'none', color: theme.palette.text.primary }}>
                        <ListItem button>
                            <ListItemIcon>
                                <PeopleIcon />
                            </ListItemIcon>
                            <ListItemText primary={"Empleados"}/>
                        </ListItem>
                    </Link>

                    <Link to="/departamento" style={{ textDecoration: 'none', color: theme.palette.text.primary }}>
                        <ListItem button>
                            <ListItemIcon>
                                <WorkIcon />
                            </ListItemIcon>
                            <ListItemText primary={"Departamentos"}/>
                        </ListItem>
                    </Link>

                    <Link to="/tipoComunicacion" style={{ textDecoration: 'none', color: theme.palette.text.primary }}>
                        <ListItem button>
                            <ListItemIcon>
                                <ReportProblemIcon />
                            </ListItemIcon>
                            <ListItemText primary={"Tipo Comunicaci??n"}/>
                        </ListItem>
                    </Link>

                </List>
                <Divider />
                    <List>
                        <ListItem button onClick = {logout}>
                            <ListItemIcon>
                                <ExitToAppIcon />
                            </ListItemIcon>
                            <ListItemText primary={"Cerrar Sesi??n"} />
                        </ListItem>
                    </List>
            </Drawer>

            <Switch>
                <Route exact path="/home">
                    <main className={classes.content}>
                        <div className={classes.toolbar} />
                            <Home />
                    </main>
                </Route>
                <Route exact path="/perfil">
                    <main className={classes.content}>
                        <div className={classes.toolbar} />
                            <Perfil />
                    </main>
                </Route>

                <Route exact path="/comunicaciones">
                    <main className={classes.content}>
                        <div className={classes.toolbar} />
                            <Comunicaciones />
                    </main>
                </Route>
                <Route exact path="/gestionAdministradores">
                    <main className={classes.content}>
                        <div className={classes.toolbar} />
                            <GestionAdministradores />
                    </main>
                </Route>
                <Route exact path="/gestionEmpleados">
                    <main className={classes.content}>
                        <div className={classes.toolbar} />
                            <GestionEmpleados />
                    </main>
                </Route>
                <Route exact path="/departamento">
                    <main className={classes.content}>
                        <div className={classes.toolbar} />
                            <Departamento />
                    </main>
                </Route>
                <Route exact path="/tipoComunicacion">
                    <main className={classes.content}>
                        <div className={classes.toolbar} />
                            <TipoComunicacion />
                    </main>
                </Route>
            </Switch>
        </div>
    </Router>
    );

}

export default MenuSuperAdmin;
