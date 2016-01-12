#include<stdlib.h>

void do_stuff (int count) {
    int * ref = malloc(count * sizeof(int));
    // do stuff using dynamic memory
    free(ref);
}

int main () {
    int count_items = 10; // assume this is determined on runtime
    do_stuff(count_items);
    return 0;
}
