import home from './home/routes';
import auth from './auth/routes';
import timeline from './timeline/routes';

export default [...home, ...auth, ...timeline];